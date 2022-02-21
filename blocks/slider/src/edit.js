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
	InnerBlocks,
	useInnerBlocksProps,
	InspectorControls
} from '@wordpress/block-editor';

import { PanelBody, RangeControl } from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps({
		// className: classes,
	});

	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ['dealersair-blocks/slider-item'],
		renderAppender: InnerBlocks.ButtonBlockAppender,
	});

	const slidesToShow = function (val) {
		setAttributes({
			slidesToShow: val
		});
	}

	const slidesToScroll = function (val) {
		setAttributes({
			slidesToScroll: val
		});
	}

	return (
		<>
			<InspectorControls>
				<PanelBody>
					<RangeControl
						label={__('Slides to show')}
						value={attributes.slidesToShow || 1}
						onChange={slidesToShow}
						min={1}
						max={21}
					/>
					<RangeControl
						label={__('Slides to scroll')}
						value={attributes.slidesToScroll || 1}
						onChange={slidesToScroll}
						min={1}
						max={21}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...innerBlocksProps} />
		</>
	);
}