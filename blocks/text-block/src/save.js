/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import {
	useBlockProps,
	RichText,
	useInnerBlocksProps
} from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save({ attributes }) {
	const innerBlocksProps = useInnerBlocksProps.save();

	return (
		<div className="nxt-text-block nxt-wrap">
			<RichText.Content
				tagName="h2"
				className="nxt-text-block__title"
				value={attributes.title}
			/>

			<div className="nxt-text-block__content nxt-lg-row">
				<div className="nxt-text-block__sub-title nxt-lg-col-4">
					{attributes.subTitle}
				</div>
				<div {...innerBlocksProps} className="nxt-text-block__items nxt-lg-col-8" />
			</div>
		</div>
	);
}
